<section class="about-gloabl">
    <div class="about-gloabl-in">
        <div class="container">
            <div class="about-gloabl-main">
                <div class="about-gloabl-content" data-aos="cs-text">
                    <?php printmeta('gb_title', '<h2 class="section-main-title">%s</h2>');?>
                </div><!-- .about-gloabl-content -->
                <div class="about-gloabl-globe">
                    <div class="about-gloabl-globe-in" data-aos="fade">
                        <div class="about-gloabl-globe-main">
                            <?php 
                                $globe = get_template_directory_uri().'/images/globe.svg';
                                //the_get_inline_svg_form_url($globe);
                            ?>
<div class="demo">
    <div class="animation-wrapper">
        <canvas id="globe-3d"></canvas>
        <canvas id="globe-2d-overlay"></canvas>
        <div id="globe-popup-overlay">
            <div class="globe-popup"></div>
        </div>
    </div>
</div>


<script type="x-shader/x-fragment" id="fragment-shader-map">
    uniform vec3 u_color_main;

    varying float vOpacity;

    float circle(vec2 st, float r) {
        vec2 dist = st - vec2(.5);
        return 1. - smoothstep(.99 * r, 1.01 * r, dot(dist, dist) * 4.);
    }

    void main() {
        float dot = circle(gl_PointCoord.xy, .7);
        if (dot < 0.5) discard;
        gl_FragColor = vec4(u_color_main, dot * vOpacity);
    }
</script>

<script type="x-shader/x-vertex" id="vertex-shader-map">
    uniform sampler2D u_visibility;
    uniform float u_size;
    uniform float u_time_since_click;
    uniform vec3 u_clicked;

    varying float vOpacity;

    void main() {

        // mask with world map
        float visibility = 1. - step(.4, texture2D(u_visibility, uv).x);
        gl_PointSize = visibility * u_size;

        // add ripple
        float time = u_time_since_click;
        float dist = length(position - u_clicked);
        float damping = pow(1. - sin(min(time, 1.)), 5.);
        float wave = (1. + sin(3. * dist + 13. * time));
        float delta = -.025 * damping * wave;

        // make backside dots darker
        vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );
        vOpacity = (1. / length(mvPosition.xyz) - .7);
        vOpacity = clamp(vOpacity, 0., .5) + .01;

        gl_Position = projectionMatrix * modelViewMatrix * vec4(position * (1. + delta), 1.);
    }
</script>
                        </div>
                    </div><!-- .about-gloabl-globe-in -->
                </div><!-- .about-gloabl-globe -->
            </div><!-- .about-gloabl-main -->
        </div><!-- .container -->
    </div><!-- .about-gloabl-in -->
</section>
