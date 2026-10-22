const { test, expect } = require('./fixtures');

test('front page is German by default', async ({ page }) => {
    await page.goto('/');
    await expect(page).toHaveTitle('Nachricht.co - Die verschlüsselte Einweg-Nachricht');
    await expect(page.locator('html')).toHaveAttribute('lang', 'de');
    await expect(page.locator('#linkForm')).toBeHidden();
});

test('language can be switched in the navbar', async ({ page }) => {
    await page.goto('/');
    await page.hover('.navbar-item.has-dropdown');
    await page.click('.navbar-dropdown a[href="/lang/en"]');

    await expect(page.locator('html')).toHaveAttribute('lang', 'en');
    await expect(page).toHaveTitle('Nachricht.co - The encrypted one-time message');
});

for (const lang of ['en', 'nl', 'ru']) {
    test(`/${lang} renders the front page in ${lang}`, async ({ page }) => {
        await page.goto(`/${lang}`);
        await expect(page.locator('html')).toHaveAttribute('lang', lang);
    });
}

test('/de redirects permanently to the front page', async ({ page }) => {
    const response = await page.goto('/de');
    const redirect = await response.request().redirectedFrom().response();

    expect(redirect.status()).toBe(301);
    await expect(page).toHaveURL('/');
    await expect(page.locator('html')).toHaveAttribute('lang', 'de');
});

for (const [title, path] of [['Häufig gestellte Fragen', '/faq'], ['Datenschutz', '/datenschutz'], ['Impressum', '/impressum']]) {
    test(`footer links to ${path}`, async ({ page }) => {
        await page.goto('/');
        await page.click(`a[href="${path}"][title="${title}"]`);

        await expect(page).toHaveURL(path);
        await expect(page).toHaveTitle(`${title} - Nachricht.co`);
    });
}

for (const [path, target] of [['/faq/aes', '/faq/aes'], ['/faq/tls', '/faq/tls'], ['/aes', '/faq/aes'], ['/tls', '/faq/tls']]) {
    test(`${path} shows ${target}`, async ({ page }) => {
        const response = await page.goto(path);

        expect(response.status()).toBe(200);
        await expect(page).toHaveURL(target);
    });
}

test('unknown page returns 404', async ({ page }) => {
    const response = await page.goto('/does-not-exist');

    expect(response.status()).toBe(404);
});
