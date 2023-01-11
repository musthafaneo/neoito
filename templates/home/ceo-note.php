    <section id="ceo-note" class="home-ceo-note" data-aos-id="fill-svg-testi">         
        <div class="container">
            <?php printmeta('ceo_title','<h2 class="section-title block lg:hidden">%s</h2>');?> 
            <div class="home-ceo-note-main">
                <div class="home-ceo-note-image" data-aos="fade-up">
                    <?php if($image = get_field('ceo_image')){  echo '<img src="'.esc_url($image['url']).'"  alt="'.esc_html_e($image['alt']).'">';}?>
                    <ul class="flex lg:hidden">
                        <?php 
                            printmeta('ceo_linked_in','<li><a href="%s" class="ln" target="_blank">'.get_svg_icon('img-linkedin', '22', '23').'</a></li>');
                            printmeta('ceo_twitter','<li><a href="%s" class="tw" target="_blank">'.get_svg_icon('img-twitter', '26', '23').'</a></li>');
                        ?>
                    </ul>
                </div><!-- .home-ceo-note-image -->
                <div class="home-ceo-note-content" data-aos="fade-up">
                    <?php 
                        printmeta('ceo_title','<h2 class="section-title hidden lg:block">%s</h2>');
                        printmeta('ceo_note','<p>%s</p>');
                    ?>
                    <div class="home-ceo-note-content-foot">
                        <?php
                            printmeta('ceo_name','<h3>%s</h3>');
                            printmeta('ceo_designation','<p>%s</p>');
                        ?> 
                        <ul class="hidden lg:flex">
                            <?php 
                                printmeta('ceo_linked_in','<li><a href="%s" class="ln" target="_blank">'.get_svg_icon('img-linkedin', '22', '23').'</a></li>');
                                printmeta('ceo_twitter','<li><a href="%s" class="tw" target="_blank">'.get_svg_icon('img-twitter', '26', '23').'</a></li>');
                            ?>
                        </ul>
                        <span  class="ceo-path-anim hidden lg:block" data-aos="na" data-aos-id="fill-svg-ceo">
                            <svg class="path-anim" data-aos-parent="home-ceo-note-content-foot" width="225" height="104" viewBox="0 0 225 104" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin"><path xmlns="http://www.w3.org/2000/svg" fill="#D5DFE6" d="M0.979554 24.0834C0.0295775 23.5198 -0.283661 22.2928 0.279916 21.3428C0.843493 20.3929 2.07047 20.0796 3.02045 20.6432L0.979554 24.0834ZM91.3555 47.9963L91.4521 49.994L91.3555 47.9963ZM138.981 73.9536L139.185 71.9641L138.981 73.9536ZM192.434 39.517L190.516 40.0864C190.215 39.0736 190.754 38.0014 191.747 37.6386C192.739 37.2757 193.842 37.7474 194.266 38.7154L192.434 39.517ZM193.933 101.717C193.722 102.801 192.672 103.509 191.588 103.298C190.504 103.088 189.796 102.038 190.007 100.953L193.933 101.717ZM221.958 64.454L221.378 66.3679L221.958 64.454ZM222.201 66.4733L223.215 68.1969L222.201 66.4733ZM220.292 66.4631L219.861 64.51L220.292 66.4631ZM220.484 64.4589L219.633 66.269L220.484 64.4589ZM3.02045 20.6432C20.7805 31.1794 51.2481 47.9342 91.2588 45.9987L91.4521 49.994C50.2055 51.9893 18.8731 34.6988 0.979554 24.0834L3.02045 20.6432ZM91.2588 45.9987C106.876 45.2432 116.53 40.4029 120.326 34.3762C122.187 31.4214 122.728 28.0693 121.825 24.4606C120.911 20.8061 118.486 16.7927 114.239 12.7145L117.009 9.82934C121.625 14.2615 124.558 18.9023 125.706 23.4897C126.865 28.1231 126.172 32.6008 123.711 36.508C118.863 44.2051 107.52 49.2167 91.4521 49.994L91.2588 45.9987ZM114.239 12.7145C105.816 4.62631 97.6206 3.64777 91.6548 6.10508C85.5862 8.60471 81.3227 14.8387 81.1186 22.2094L77.1202 22.0987C77.3646 13.271 82.491 5.55359 90.1314 2.40654C97.8745 -0.782821 107.707 0.896734 117.009 9.82934L114.239 12.7145ZM81.1186 22.2094C80.9144 29.5866 85.6082 41.0258 95.4509 51.212C105.217 61.3188 119.868 69.981 139.185 71.9641L138.776 75.9432C118.442 73.8556 102.938 64.7173 92.5744 53.9915C82.2871 43.3452 76.8759 30.9199 77.1202 22.0987L81.1186 22.2094ZM139.185 71.9641C168.512 74.9749 203.165 68.1883 219.861 64.51L220.722 68.4163C204.025 72.0947 168.808 79.0263 138.776 75.9432L139.185 71.9641ZM219.633 66.269C214.685 63.9439 208.287 60.1686 202.718 55.6576C197.218 51.2034 192.207 45.7786 190.516 40.0864L194.351 38.9475C195.681 43.4265 199.875 48.2078 205.235 52.5493C210.525 56.834 216.642 60.444 221.334 62.6487L219.633 66.269ZM194.266 38.7154C196.704 44.2895 205.394 57.3401 222.539 62.5401L221.378 66.3679C202.808 60.7358 193.364 46.6337 190.601 40.3185L194.266 38.7154ZM223.215 68.1969C217.536 71.5394 210.695 77.2152 205 83.4941C199.249 89.8341 194.952 96.4771 193.933 101.717L190.007 100.953C191.244 94.5904 196.179 87.2656 202.037 80.8067C207.951 74.2869 215.097 68.3332 221.186 64.7496L223.215 68.1969ZM222.539 62.5401C223.867 62.9431 224.572 64.0874 224.699 65.1491C224.827 66.2113 224.414 67.4915 223.215 68.1969L221.186 64.7496C220.789 64.9836 220.699 65.3891 220.728 65.6269C220.757 65.8643 220.939 66.2347 221.378 66.3679L222.539 62.5401ZM219.861 64.51C219.35 64.6226 219.119 65.065 219.092 65.3538C219.066 65.6332 219.199 66.0649 219.633 66.269L221.334 62.6487C222.661 63.272 223.179 64.5999 223.075 65.7235C222.969 66.8567 222.196 68.0916 220.722 68.4163L219.861 64.51Z"/></svg>
            </span>
                    </div><!-- .home-ceo-note-content-foot -->
                </div><!-- .home-ceo-note-content -->
                
            </div><!-- .home-ceo-note-main -->
        </div><!-- .container -->        
    </section>
