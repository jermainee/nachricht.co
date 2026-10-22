const { test, expect, createMessage } = require('./fixtures');

const readonlyMessage = '.frontPage__messageField--readonly';

test('message can be created, read once and is destroyed afterwards', async ({ page }) => {
    const { link, path } = await createMessage(page, { text: 'Hallo aus Chromium! Mehr unter https://example.com' });

    await expect(page.locator('#shareWhatsApp')).toHaveAttribute('href', 'https://wa.me/?text=' + link);
    await expect(page.locator('#shareTelegram')).toHaveAttribute('href', 'https://telegram.me/share/url?url=' + link);

    await page.goto(path);
    await expect(page.locator('body')).toContainText('Die Nachricht kann nur ein Mal geöffnet werden');
    await page.click('a.button[href="/n"]');

    await expect(page.locator(readonlyMessage)).toHaveText('Hallo aus Chromium! Mehr unter https://example.com');
    await expect(page.locator(`${readonlyMessage} a`)).toHaveAttribute('href', 'https://example.com');

    await page.goto(path);
    await expect(page).toHaveURL('/');
});

test('password protected message requires the correct password', async ({ page }) => {
    const { path } = await createMessage(page, { text: 'Geheim', password: 's3cret' });
    const passwordForm = page.locator('form[action="/n"]');

    await page.goto(path);
    await passwordForm.locator('input[name=password]').fill('falsch');
    await passwordForm.locator('button').click();
    await expect(page).toHaveURL(path);
    await expect(page.locator(readonlyMessage)).toHaveCount(0);

    await passwordForm.locator('input[name=password]').fill('s3cret');
    await passwordForm.locator('button').click();
    await expect(page.locator(readonlyMessage)).toHaveText('Geheim');
});

test('message can be kept after reading', async ({ page }) => {
    const { path } = await createMessage(page, { text: 'Bleibt erhalten', keepAfterRead: true, deletion: 168 });

    for (let i = 0; i < 2; i++) {
        await page.goto(path);
        await page.click('a.button[href="/n"]');
        await expect(page.locator(readonlyMessage)).toHaveText('Bleibt erhalten');
    }
});

test('unknown message redirects to the front page', async ({ page }) => {
    await page.goto('/aaaaaaaaaaaaaaaa_bbbbbbbbbbbbbbbb');
    await expect(page).toHaveURL('/');
});
