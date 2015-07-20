<?php $this->layout('theme::layout/00_layout') ?>

<?php if ($params['html']['repo']) { ?>
    <a href="https://github.com/<?= $params['html']['repo']; ?>" target="_blank" id="github-ribbon" class="hidden-print"><img src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
<?php } ?>
<div class="container-fluid fluid-height wrapper">
    <div class="navbar navbar-fixed-top hidden-print">
        <div class="container-fluid">
            <?php $this->insert('theme::partials/navbar_content', ['params' => $params]); ?>
        </div>
    </div>
    <div class="row columns content">
        <div class="left-column article-tree col-sm-3 hidden-print">
            <!-- For Mobile -->
            <div class="responsive-collapse">
                <button type="button" class="btn btn-sidebar" id="menu-spinner-button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="sub-nav-collapse" class="sub-nav-collapse">
                <!-- Navigation -->
                <?php
                if ($page['language'] !== '') {
                    echo $this->get_navigation($tree->value[$page['language']], $page['language'], isset($params['request']) ? $params['request'] : '', $base_page, $params['mode']);
                } else {
                    echo $this->get_navigation($tree, '', isset($params['request']) ? $params['request'] : '', $base_page, $params['mode']);
                }
                ?>

                <?php if (!empty($params['html']['links']) || !empty($params['html']['twitter']) || $params['html']['toggle_code']) { ?>
                    <div class="well well-sidebar">

                        <!-- Links -->
                        <?php
                        foreach ($params['html']['links'] as $name => $url) {
                            echo '<a href="' . $url . '" target="_blank">' . $name . '</a><br>';
                        }
                        if ($params['html']['toggle_code']) {
                            echo '<a href="#" id="toggleCodeBlockBtn" onclick="toggleCodeBlocks();">Show Code Blocks Inline</a><br>';
                        }
                        ?>

                        <!-- Twitter -->
                        <?php foreach ($params['html']['twitter'] as $handle) { ?>
                            <div class="twitter">
                                <hr/>
                                <iframe allowtransparency="true" frameborder="0" scrolling="no" style="width:162px; height:20px;" src="https://platform.twitter.com/widgets/follow_button.html?screen_name=<?= $handle; ?>&amp;show_count=false"></iframe>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="right-column <?= $params['html']['float'] ? 'float-view' : ''; ?> content-area col-sm-9">
            <div class="content-page">
                <?= $this->section('content'); ?>
            </div>
        </div>
    </div>
</div>
