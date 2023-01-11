import * as THREE from 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r126/three.module.min.js';
import { OrbitControls } from 'https://unpkg.com/three@0.126.0/examples/jsm/controls/OrbitControls.js';

const demo = document.querySelector('.demo');
const container = document.querySelector('.animation-wrapper');
const globeCanvas = container.querySelector('#globe-3d');
const globeOverlayCanvas = container.querySelector('#globe-2d-overlay');
const popup = container.querySelector('.globe-popup');


document.addEventListener('DOMContentLoaded', () => {
    gsap.set(demo, {
        height: window.innerHeight
    });

    let surface = new Surface();

    new THREE.TextureLoader().load(
        'https://ksenia-k.com/img/demos-preview/earth-map.jpeg',
        (mapTex) => {
            surface.earthTexture = mapTex;
            surface.earthTexture.repeat.set(1, 1);
            surface.earthTextureData = surface.getImageData();
            surface.createGlobe();
            surface.addAnchor();
            surface.updateDotSize();
            surface.loop();
        });

    window.addEventListener('resize', () => {
        gsap.set(demo, {
            height: window.innerHeight
        });

        //surface.updateSize();
        surface.setupOverlayGraphic();
        surface.updateDotSize();
    }, false);
  
   gsap.to('.title', {
     delay: 5,
     duration: .2,
     opacity: 1
   })

});


class Surface {

    constructor() {
        this.renderer = new THREE.WebGLRenderer({canvas: globeCanvas, alpha: true});
        this.scene = new THREE.Scene();
        this.camera = new THREE.OrthographicCamera(-1, 1, 1, -1, .1, 2);
        this.camera.position.z = 1.1;
        this.updateSize();

        this.rayCaster = new THREE.Raycaster();
        this.rayCaster.far = 1.15;
        this.mouse = new THREE.Vector2();
        this.coordinates2D = [0, 0];

        this.setupOverlayGraphic();
        this.createOrbitControls();

        this.clock = new THREE.Clock();
        this.clickTime = 0;

        this.group = new THREE.Group();
        this.group.scale.setScalar(0.9);
        this.scene.add(this.group);

        this.selectionVisible = false;
    }

    createOrbitControls() {
        this.controls = new OrbitControls(this.camera, globeCanvas);
        this.controls.enablePan = true;
        this.controls.enableZoom = false;
        this.controls.enableDamping = true;
        this.controls.minPolarAngle = .35 * Math.PI;
        this.controls.maxPolarAngle = .65 * Math.PI;
        this.controls.autoRotate = true;
    }

    createGlobe() {
        const globeGeometry = new THREE.IcosahedronGeometry(1, 30);
        this.mapMaterial = new THREE.ShaderMaterial({
            vertexShader: document.getElementById('vertex-shader-map').textContent,
            fragmentShader: document.getElementById('fragment-shader-map').textContent,
            uniforms: {
                u_visibility: {type: 't', value: this.earthTexture},
                u_size: {type: 'f', value: 0},
                u_color_main: {type: 'v3', value: new THREE.Color('#4E5164')},
                u_clicked: {type: 'v3', value: new THREE.Vector3(.0, .0, 1.)},
                u_time_since_click: {value: 3.},
            },
            alphaTest: false,
            transparent: true
        });

        const globe = new THREE.Points(globeGeometry, this.mapMaterial);
        this.group.add(globe);

        this.blackGlobe = new THREE.Mesh(globeGeometry, new THREE.MeshBasicMaterial({
            color: 0x2C2C2E,
            transparent: true,
            opacity: 0.2
        }));
        this.blackGlobe.scale.setScalar(0.99);
        this.group.add(this.blackGlobe);
    }

    addAnchor() {
        const geometry = new THREE.SphereGeometry(.02, 16, 16);
        const material = new THREE.MeshBasicMaterial({
            color: "#F36D45",
            transparent: true,
            opacity: 1
        });
        this.anchor = new THREE.Mesh(geometry, material);
        this.group.add(this.anchor);
        this.anchor1 = new THREE.Mesh(geometry, material);
        this.group.add(this.anchor1);
        this.anchor2 = new THREE.Mesh(geometry, material);
        this.group.add(this.anchor2);
        this.anchor3 = new THREE.Mesh(geometry, material);
        this.group.add(this.anchor3);


        var data = [-0.21192214203218035, 0.20610061083077572, 0.9553070417052695];
        var data1 = [-0.4969742091102743, 0.8654542517289493, 0.06328960138523453];
        var data2 = [-0.5794872141583425,0.8126423938282618, -0.06170014894694849];
        var data3 = [0.3092790394750786, 0.6907587059285049, -0.6536045332809052]
        this.anchor.position.set(data[0], data[1], data[2]);
        this.mapMaterial.uniforms.u_clicked.value = this.anchor.position;
        this.anchor1.position.set(data1[0], data1[1], data1[2]);
        this.mapMaterial.uniforms.u_clicked.value = this.anchor1.position;
        this.anchor2.position.set(data2[0], data2[1], data2[2]);
        this.mapMaterial.uniforms.u_clicked.value = this.anchor2.position;
        this.anchor3.position.set(data3[0], data3[1], data3[2]);
        this.mapMaterial.uniforms.u_clicked.value = this.anchor3.position;
                
    }

    setupOverlayGraphic() {
        this.overlayCtx = globeOverlayCanvas.getContext('2d');
        this.overlayCtx.strokeStyle = '#4BC0C8';
        this.overlayCtx.lineWidth = 5;
        this.overlayCtx.lineCap = 'round';
    }

    getImageData() {
        const image = this.earthTexture.image;
        const canvas = document.createElement('canvas');
        canvas.width = image.width;
        canvas.height = image.height;
        const context = canvas.getContext( '2d' );
        context.drawImage(image, 0, 0);
        return context.getImageData(0, 0, image.width, image.height);
    }


    render() {
        this.mapMaterial.uniforms.u_time_since_click.value = this.clock.getElapsedTime() - this.clickTime;
        this.controls.update();
        this.renderer.render(this.scene, this.camera);
    }

    loop() {
        this.render();
        requestAnimationFrame(this.loop.bind(this));
    }

    updateSize() {
        var minSide = .85 * Math.min(window.innerWidth, window.innerHeight);
        if(window.innerWidth >= 992){
          minSide = 800;
        }
        container.style.width = minSide + 'px';
        container.style.height = minSide + 'px';
        this.renderer.setSize(minSide, minSide);
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        this.camera.updateProjectionMatrix();
        globeOverlayCanvas.width = minSide;
        globeOverlayCanvas.height = minSide;
    }

    updateDotSize() {
        this.mapMaterial.uniforms.u_size.value = .03 * container.offsetWidth;
    }
}