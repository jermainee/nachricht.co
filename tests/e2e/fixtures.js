const base = require('@playwright/test');

exports.test = base.test.extend({
    context: async ({ context, baseURL }, use) => {
        // Only talk to the app itself, ads and other third-party scripts are blocked.
        await context.route(url => !url.href.startsWith(baseURL), route => route.abort());
        await use(context);
    },
});

exports.expect = base.expect;

/**
 * Creates a message through the form on the front page and returns the path of its link.
 * Links always point to https://nachricht.co, the path is used to open them on the test server.
 */
exports.createMessage = async (page, { text, password, keepAfterRead, deletion }) => {
    await page.goto('/');
    await page.fill('#messageField', text);

    if (password) {
        await page.fill('#messageSettings input[name=password]', password);
    }
    if (deletion) {
        await page.selectOption('select[name=deletion]', String(deletion));
    }
    if (keepAfterRead) {
        await page.click('label[for=deleteAfterRead]');
    }

    await page.click('#messageForm button.is-primary');
    await base.expect(page.locator('#linkForm')).toBeVisible();

    const link = await page.inputValue('#messageLink');
    base.expect(link).toMatch(/^https:\/\/nachricht\.co\/\w{16}_\w{16}$/);

    return { link, path: new URL(link).pathname };
};
