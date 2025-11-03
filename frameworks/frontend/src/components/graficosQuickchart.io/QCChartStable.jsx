// src/components/graficosQuickchart.io/QCChartStable.jsx

import { useEffect, useState } from 'react';

import { buildQuickChartURL } from '../../utils/quickchart';

export default function QCChartStable({
    arregloCompleto,    
    width = 'full',
    height = '200px',
    format = 'png',
    backgroundColor = 'transparent',
    alt = 'chart',
    className = '',
}) {
    // comienzo de const:

    const arrCats = (() => {
        const seenUno = new Set();
        const outUno = [];
        for (const i of (arregloCompleto.categorias ?? [])) {
            const raw = i?.nombre;
            if (typeof raw !== 'string') continue;
            const norm = raw.trim().toLowerCase();
            if (!norm || seenUno.has(norm)) continue;
            seenUno.add(norm);
            outUno.push(raw.trim());
        }
        return outUno;
    })();    

    const counts = (arregloCompleto.listaObjetosPartidaInformacion ?? []).reduce((acc, e) => {
        const k = (e?.categoria ?? '').trim().toLowerCase();
        if (!k) return acc;
        acc[k] = (acc[k] ?? 0) + 1;
        return acc;
    }, {});

    const categoriasConConteo = arrCats.map(cat => {
        const norm = cat.trim().toLowerCase();
        return {
            categoria: cat,
            count: counts[norm] ?? 0
        };
    });

    const nuevoLabels = categoriasConConteo.map(e => e.categoria);
    const nuevoData = (() => {
        const base = categoriasConConteo.map(e => e.count);
        const total = base.reduce((acc, n) => acc + n, 0);
        return [...base, total];
    })();

    const config = {
        type: 'bar',
        data: {
            labels: nuevoLabels,
            datasets: [{
                label: 'Categorias',
                data: nuevoData,
                backgroundColor: '#e12afbf2',
                borderColor: '#e32afb',
                borderWidth: 1,
            }],
        },
        options: {
            plugins: {
                legend: { labels: { color: 'white' } },
                datalabels: {
                    anchor: 'center',
                    align: 'center',
                    color: '#fff',
                    font: {
                        weight: 'bold',
                    },
                },
            },
            scales: {
                x: {
                    ticks: { color: 'white', autoSkip: false }, 
                    grid: {
                        display: true,                      
                        color: 'white',         
                        lineWidth: 1,
                        drawOnChartArea: true,
                        drawTicks: true,
                        borderColor: 'rgba(0,0,0,0.2)',
                    },
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: 'white' },
                    grid: {
                        display: true,
                        color: 'white',
                        lineWidth: 1,
                        drawOnChartArea: true,
                        drawTicks: true,
                        borderColor: 'rgba(0,0,0,0.2)',
                        borderWidth: 1,
                    },
                    title: {
                        display: true,
                        text: 'Partidas realizadas',
                        color: 'white',
                        padding: { top: 2, bottom: 4 },
                        font: { size: 14, family: 'sans-serif', weight: 'light' },
                    },
                },
            },
        },
    };
    
    const baseUrl = buildQuickChartURL({ config, width, height, format, backgroundColor });
    const withVersion = `${baseUrl}`;
    const [src, setSrc] = useState(withVersion);

    useEffect(() => {
        const url = buildQuickChartURL({ config, width, height, format, backgroundColor }) + '&version=4';
        setSrc(url);
    }, [JSON.stringify(config), width, height, format, backgroundColor]);

    return (
        <img
            src={src}
            alt={alt}
            className={className}            
            loading="lazy"
        />
    );
}
