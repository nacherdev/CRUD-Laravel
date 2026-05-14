import { chromium } from 'playwright';


async function scrapeWikipedia(busqueda) {
    const browser = await chromium.launch({ 
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox'] // Vital para Docker
    });
    try {
        
        const page = await browser.newPage();
        
        await page.goto('https://es.wikipedia.org/wiki/Wikipedia:Bienvenidos');

        const input = await page.locator('.cdx-text-input__input').first();
        await input.fill(busqueda);
        await input.press('Enter');

        const paragraph = await page.locator('#mw-content-text p:not(.mw-empty-elt)').first().textContent();

        console.log(JSON.stringify({ parrafo: paragraph.trim() }));

            await browser.close();
    } catch (error) {
        console.log(JSON.stringify({ error: error.message }));
    } finally {
        await browser.close();
    }
}

const miBusqueda = process.argv[2];
scrapeWikipedia(miBusqueda);