<?php

function get_career_jobs($link)
{
    // if (empty($perpage)) {
    //     $perpage = -1;
    // }

   
    $response = wp_remote_get($link);



    if (is_wp_error($response)) {
        return false; // Bail early
    }

    $jobs = json_decode(wp_remote_retrieve_body($response));
    $totalJobs = $jobs->totalJobs;
    $jobs_data = $jobs->data;
    $pages = ceil($totalJobs/10);

echo "<h1>".$pages."</h1>";
    if (empty($jobs_data)) {
        return;
    }

//dp($jobs_data);
    if (!empty($jobs_data)) :
        foreach ($jobs_data as $job) {


            $id = $job->id;
            $jobTitle = $job->jobTitle;
            $location = $job->location;
            $minExperience = $job->minExperience;
            $maxExperience = $job->maxExperience;
            $jobDescription = $job->jobDescription;
            $new_job_desc = explode("Responsibilities:",$jobDescription);
            //dp($new_job_desc);
            $EmploymentType = $job->EmploymentType->name;

            
           
?>
            <div class="career-listing-item" data-aos="fade-up">
                <div class="career-listing-item-main">
                    <div class="career-listing-item-in">
                        <h3><?php echo $jobTitle; ?></h3>
                        <?php echo '<p>'. strip_tags($new_job_desc[0]). '</p>'; ?>
                    </div><!-- .home-blog-list-item-in -->
                    <a href="https://jobs.hyremaster.com/neoito/<?php echo $id; ?>" target="_blank" class="apply-button">Apply Now</a>
                </div><!-- .home-blog-list-item-main -->
                <div class="career-listing-item-footer">
                    <ul>
                         <li><?php echo $EmploymentType; ?></li> 
                    </ul>
                    <span>
                        <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="xMinYMin">
                            <path xmlns="http://www.w3.org/2000/svg" fill="#282A37" d="M15.3033 14.4698L10 19.7731L4.69667 14.4698C3.64779 13.4209 2.93349 12.0845 2.64411 10.6296C2.35473 9.17479 2.50326 7.6668 3.07092 6.29636C3.63858 4.92592 4.59987 3.75458 5.83324 2.93048C7.0666 2.10637 8.51665 1.6665 10 1.6665C11.4834 1.6665 12.9334 2.10637 14.1668 2.93048C15.4001 3.75458 16.3614 4.92592 16.9291 6.29636C17.4968 7.6668 17.6453 9.17479 17.3559 10.6296C17.0665 12.0845 16.3522 13.4209 15.3033 14.4698ZM10 12.4998C10.8841 12.4998 11.7319 12.1486 12.357 11.5235C12.9821 10.8983 13.3333 10.0505 13.3333 9.16644C13.3333 8.28238 12.9821 7.43454 12.357 6.80942C11.7319 6.18429 10.8841 5.83311 10 5.83311C9.11595 5.83311 8.2681 6.18429 7.64298 6.80942C7.01786 7.43454 6.66667 8.28238 6.66667 9.16644C6.66667 10.0505 7.01786 10.8983 7.64298 11.5235C8.2681 12.1486 9.11595 12.4998 10 12.4998ZM10 10.8331C9.55798 10.8331 9.13405 10.6575 8.82149 10.3449C8.50893 10.0324 8.33334 9.60847 8.33334 9.16644C8.33334 8.72441 8.50893 8.30049 8.82149 7.98793C9.13405 7.67537 9.55798 7.49977 10 7.49977C10.442 7.49977 10.866 7.67537 11.1785 7.98793C11.4911 8.30049 11.6667 8.72441 11.6667 9.16644C11.6667 9.60847 11.4911 10.0324 11.1785 10.3449C10.866 10.6575 10.442 10.8331 10 10.8331Z" />
                        </svg>
                        <?php echo $location; ?>
                    </span>
                </div><!-- .home-blog-list-item-footer -->
            </div><!-- .home-blog-list-item -->
<?php
        }
    endif;
}

?>
<section id="jobs" class="career-listing">
    <div class="container">
        <?php printmeta('op_title', '<h2 class="section-main-title" data-aos="fade-up">%s</h2>'); ?>
        <div class="career-listing-items" id="loadmorecontainer">
            <?php //get_career_jobs('https://api.hyremaster.com/api/job/Jobs_Public?page=0&id=76&limit=3'); ?>
            <?php get_career_jobs('https://api.hyremaster.com/api/job/Jobs_Public?id=76&page=0'); ?>
            <?php // $link = get_next_posts_link('link', $jobs->max_num_pages);
             //if ($link) {
            echo '<div class="load-more text-center" data-aos="fade-up"><a href="' .  get_career_jobs('https://api.hyremaster.com/api/job/Jobs_Public?id=76&page=1') . '" class="loadmore" data-target="#loadmorecontainer"><span>' . esc_html__('Loadmore', 'crstech') . '</span></a></div>';
             //}
            ?>

        </div><!-- .career-listing-items -->
    </div><!-- .container -->
</section>


<section>



</section>