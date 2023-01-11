<?php

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$per_page = 10; // number of items to show per page
$offset = ($page - 1) * $per_page;

// Make API call to external API
$response = wp_remote_get('https://external-api.com/posts?per_page=' . $per_page . '&offset=' . $offset);
$response = wp_remote_get('https://api.hyremaster.com/api/job/Jobs_Public?id=76&page=0');

$jobs = json_decode(wp_remote_retrieve_body($response));
    $totalJobs = $jobs->totalJobs;
    $jobs_data = $jobs->data;
    $pages = ceil($totalJobs/10);



if (is_wp_error($response)) {
  // API call failed
  echo 'Error: ' . $response->get_error_message();
} else {
  // API call succeeded
  $posts = json_decode($response['body'], true);

  // Loop through posts and display them
  foreach ($posts as $post) {
    echo '<h3>' . $post['title'] . '</h3>';
    echo '<p>' . $post['content'] . '</p>';
  }

  // Display "Load More" button
  echo '<button id="load-more" data-page="' . $page . '">Load More</button>';
}

?>
<script>
jQuery(document).ready(function($) {
  $('#load-more').click(function() {
    var page = $(this).data('page');
    $.ajax({
      url: '<?php echo admin_url('admin-ajax.php'); ?>',
      type: 'GET',
      data: {
        action: 'load_more',
        page: page
      },
      success: function(response) {
        // Append the new posts to the page
        $('#posts-container').append(response);
        // Increment the page number and update the button
        page++;
        $('#load-more').data('page', page).text('Load More');
      }
    });
  });
});
</script>