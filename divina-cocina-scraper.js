import { chromium } from 'playwright';

async function scrapeDivinaCocina() {

    // Configuracion del navegador para no parecer un bot, (hasta linea 14)
    
    const browser = await chromium.launch({
        args: ['--disable-blink-features=AutomationControlled'] // Para que no me detecte como un bot
    });

    const context = await browser.newContext({
        userAgent: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
        viewport: { width: 1280, height: 800 }
    });

    const page = await context.newPage();

    try {
        console.log('Iniciando busqueda...');
        await page.goto('https://www.divinacocina.es/', { waitUntil: 'domcontentloaded' });

        // Boton de Cookies
        try {
            const cookieBtn = '#accept-btn';
            await page.waitForSelector(cookieBtn, { timeout: 5000 });
            await page.click(cookieBtn);
        } catch (e) {
            console.log('No se ha encontrado el botón de cookies o ya se ha aceptado.');
        }

        // Hacer varios scrolls hasta abajo para que carguen los anuncios
        await page.evaluate(async () => {
            await new Promise((resolve) => {
                let totalHeight = 0;
                let distance = 200;
                let timer = setInterval(() => {
                    let scrollHeight = document.body.scrollHeight;
                    window.scrollBy(0, distance);
                    totalHeight += distance;

                    if (totalHeight >= scrollHeight) {
                        clearInterval(timer);
                        resolve();
                    }
                }, 100);
            });
        });

        // Esperamos 5 segundos por si acaso no ha cargado los anuncios
        await page.waitForTimeout(5000);

        // Buscamos los anuncios
        const anunciosValidos = await page.$$eval('.ssm_adunit_container', (contenedores) => {
            return contenedores
                .map(container => {
                    const divConId = container.querySelector('div[id]');
                    if (!divConId) return null;

                    return {
                        idContenedorPadre: container.id || 'Sin ID',
                        idAnuncioInterno: divConId.id,
                        claseContenedor: container.className
                    };
                })
                .filter(anuncio => anuncio !== null);
        });

        // Imprimir por terminal los anuncios encontrados
        if (anunciosValidos.length > 0) {
            console.log(`Se han encontrado ${anunciosValidos.length} anuncios:`);
            console.table(anunciosValidos);
        } else {
            console.log('No se encontró ningún anuncio.');
        }

    } catch (error) {
        console.error("Error durante el proceso:", error.message);
    } finally {
        console.log('Finalizado');
        await browser.close();
    }
}

scrapeDivinaCocina();