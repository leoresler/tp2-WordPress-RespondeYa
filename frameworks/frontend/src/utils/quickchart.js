// src/utils/quickchart.js
export function buildQuickChartURL({ 
    config, 
    width, 
    height, 
    format, 
    backgroundColor,
}) {
    const base = 'https://quickchart.io/chart';
    const params = new URLSearchParams({
        c: JSON.stringify(config),
        width: String(width),
        height: String(height),
        format,
        backgroundColor,
    });
    return `${base}?${params.toString()}`;
}
