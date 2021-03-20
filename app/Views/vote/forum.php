<main>
    <h1 style="text-align: center; color: #fff"><?= $dev['app']; ?> - <?= $dev['tim']; ?></h1>
    <?php
    $inputs = session()->getFlashdata('inputs');
    $error = session()->getFlashdata('error');
    $errors = session()->getFlashdata('errors');
    $success = session()->getFlashdata('success');
    if(!empty($errors)){ ?>
    <div class="alert alert-danger" role="alert">
        <ul>
        <?php foreach ($errors as $errors) : ?>
            <li><?= esc($errors) ?></li>
        <?php endforeach ?>
        </ul>
    </div>
    <br />
    <?php } if(!empty($error)){ ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <li><?= esc($error) ?></li>
        </ul>
    </div>
    <br />
    <?php } if(!empty($success)){ ?>
    <div class="alert alert-success" role="alert">
        <?= esc($success) ?><br />
    </div>
    <br />
    <?php } ?>
    <div class="topic-container">
            <!--Original thread-->

            <div class="body">
                <div class="authors">
                    <div class="username" style="color: white;">ADMIN</div>
                    <br/>
                    <img src="<?= base_url("assets/vote/img/avatar.jpg"); ?>" alt="">
                </div>
                <div class="content">
                    Silhakan berikan komentar atau pertanyaan terhadap developer untuk tim <?= $dev['tim']; ?>
                    <hr>
                    <br>
                    <div class="comment">
                        <button onclick="showComment()">Comment</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Comment Area-->
        <div class="comment-area hide" id="comment-area">
            <form action="<?= base_url("users/post_comment"); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_visitor" value="<?= $user_login['id']; ?>">
                <textarea name="comment" id="" placeholder="comment here ... "></textarea>
                <input type="submit" value="submit">
            </form>
        </div>

        <!--Comments Section-->
        <div class="comments-container">
            <div class="body">
                <div class="authors">
                    <div class="username"style="color: white;">peserta 1</div>
                    <br/>
                    <img src="<?= base_url("assets/vote/img/avatar.jpg"); ?>" alt="">
                    <div>Points:</div>
                    <div class="rate">
                    <form action="">
                        <table>
                        <td>
                            <img src="<?= base_url("assets/vote/img/logo1.png"); ?>" style="width: 30px; height: 30px;">
                        </td>
                        <td>
                            <input type="number" id="quantity" name="quantity" min="1" max="5">
                            <input type="submit">
                        </td>
                        </table>
                    </form>
                    </div>
                </div>
                <div class="content">
                    Just a comment of the above random topic.
                    <br>To see how it looks like.
                    <br><br>
                    Nothing more and nothing less.
                    <br>
                    <br>
                    <div class="comment">
                        <button onclick="showReply()">Reply</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Reply Area-->
        <div class="comment-area hide" id="reply-area">
            <textarea name="reply" id="" placeholder="reply here ... "></textarea>
            <input type="submit" value="submit">
        </div>


        <!--Another Comment With replies-->
        <!--Reply Area-->
    </div>
    <br>
    <br>  
</main>