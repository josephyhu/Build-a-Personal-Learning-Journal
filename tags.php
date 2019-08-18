<?php
require 'inc/functions.php';

$tag = filter_input(INPUT_GET, 't', FILTER_SANITIZE_STRING);
$item = get_entry_by_tag($tag);

$section = $tag;

include 'inc/header.php'; ?>
  <section>
    <div class="container">
      <div class="entry-list">
        <article>
          <h2><a href="detail.php?id=<?php echo $item[0]['id']; ?>"><?php echo $item[0]['title']; ?></a></h2>
          <time datetime="<?php $item[0]['date']; ?>"><?php echo date("F d, Y", strtotime($item[0]['date'])); ?></time>
        </article>
      </div>
    </div>
  </section>
<?php include 'inc/footer.php'; ?>
