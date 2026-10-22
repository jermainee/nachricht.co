const { devices } = require('@playwright/test');
const { test, expect, createMessage } = require('./fixtures');

test('front page scripts run without uncaught errors', async ({ page }) => {
    const errors = [];
    page.on('pageerror', error => errors.push(error.message));

    await page.goto('/');
    await page.waitForLoadState('load');

    expect(errors).toEqual([]);
});

test('copy button confirms that the link was copied', async ({ page }) => {
    await createMessage(page, { text: 'Bitte kopieren' });
    await page.click('#copyLink');

    await expect(page.locator('#copyLink img')).toHaveAttribute('src', '/images/icons/check-white.svg');
});

test.describe('on mobile', () => {
    // Pixel 7 keeps Chromium, iPhone devices would switch to WebKit.
    const { defaultBrowserType, ...pixel7 } = devices['Pixel 7'];
    test.use(pixel7);

    test('language menu opens and switches the language', async ({ page }) => {
        await page.goto('/');
        await expect(page.locator('#mobileLanguageMenu')).toBeHidden();

        await page.click('#mobileLanguageButton');
        await expect(page.locator('#mobileLanguageMenu')).toBeVisible();

        await page.click('#mobileLanguageMenu a[href="/lang/en"]');
        await expect(page.locator('html')).toHaveAttribute('lang', 'en');
        await expect(page).toHaveTitle('Nachricht.co - The encrypted one-time message');
    });
});
