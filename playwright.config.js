const { defineConfig, devices } = require('@playwright/test');

const port = process.env.E2E_PORT || 8000;
const baseURL = `http://127.0.0.1:${port}`;

module.exports = defineConfig({
    testDir: './tests/e2e',
    forbidOnly: !!process.env.CI,
    reporter: process.env.CI ? [['github'], ['html', { open: 'never' }]] : 'list',
    use: {
        baseURL,
        locale: 'de-DE',
        trace: 'retain-on-failure',
        screenshot: 'only-on-failure',
        launchOptions: {
            // Allows running against a preinstalled Chromium instead of `npx playwright install`.
            executablePath: process.env.PLAYWRIGHT_CHROMIUM_EXECUTABLE_PATH || undefined,
        },
    },
    projects: [
        { name: 'chromium', use: { ...devices['Desktop Chrome'] } },
    ],
    webServer: {
        command: `php artisan serve --host=127.0.0.1 --port=${port}`,
        url: baseURL,
        reuseExistingServer: !process.env.CI,
    },
});
