import { NeatConfig, NeatGradient } from "@firecms/neat";

// config
export const config: NeatConfig = {
    colors: [
        {
            color: '#FF5373',
            enabled: false,
        },
        {
            color: '#FFC858',
            enabled: false,
        },
        {
            color: '#17E7FF',
            enabled: false,
        },
        {
            color: '#00343A',
            enabled: false,
        },
        {
            color: '#f5e1e5',
            enabled: false,
        },
    ],
    speed: 2,
    horizontalPressure: 2,
    verticalPressure: 5,
    waveFrequencyX: 2,
    waveFrequencyY: 2,
    waveAmplitude: 5,
    shadows: 10,
    highlights: 8,
    colorBrightness: 1,
    colorSaturation: 10,
    wireframe: true,
    colorBlending: 6,
    backgroundColor: '#00343A',
    backgroundAlpha: 1,
    grainScale: 0,
    //grainSparsity: 0,
    grainIntensity: 0,
    grainSpeed: 0,
    resolution: 0.95,
};


// Asegúrate de que el elemento existe y es un HTMLCanvasElement
const gradientElement = document.getElementById("gradient") as HTMLCanvasElement;
if (!gradientElement) {
    throw new Error("Element with id 'gradient' not found or is not a canvas element.");
}

// define an element with id="gradient" in your html
const neat = new NeatGradient({
    ref: gradientElement,
    ...config
});

// you can change the config at any time
neat.speed = 6;