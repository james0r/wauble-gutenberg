
<!-- Begin Loop -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="frontpage-template" x-data="{ expanded: true }">
  <h1 style="display: inline-block;">Front-page.php</h1>
  <button @click="expanded = ! expanded">
    Toggle Collapse Section
  </button>
  <div class="frontpage-template-inner" x-show="expanded" x-collapse.duration.1000ms.min.100px>

    Featured Image: <br>

    <?php echo get_the_post_thumbnail(get_the_ID(), [400]); ?>

    <div>
      <h2>Alpine.js Demos</h2>

      <ul>
        <li>
          <h3>Stores</h3>
          <span x-data x-text="`Theme name: ${$store.globals.themeName}`"></span>
          </a>
        </li>
        <li>
          <h3>Components</h3>
          <div class="dropdown-component" x-data="dropdown">
            <button @click="open">Open</button>
            <span x-show="isOpen">Dropdown is showing</span>
          </div>
        </li>
        <li>
          <h3>Magic Properties</h3>
          <span>Money With Currency: </span><span x-data x-text="$money(1999, 'amount')"></span>
          <br>
          <span>Money Without Trailing Zeros: </span><span x-data x-text="$money(2000000, 'amount_no_decimals')"></span>
        </li>
        <li>
          <h3>Directives</h3>
          <button x-data x-test-directive>Click me and check the console</button>
        </li>
      </ul>
    </div>

    <form role="search" method="get" id="searchform" class="searchform" action="">
      <div>
        <label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="search-submit" value="Search" />
      </div>
    </form>

    <?php get_template_part('template-parts/social-links'); ?>
  </div>
</div>

<?php endwhile; endif; ?>
<!-- End Loop -->