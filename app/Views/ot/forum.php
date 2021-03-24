<main>
    <h1 style="text-align: center; color: #fff">Forum Pertanyaan Open Talk</h1>
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
                    Silhakan berikan komentar atau pertanyaan untuk pemateri.
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
                <input type="hidden" name="id_dev" value="0">
                <input type="hidden" name="type_dev" value="ot">
                <?php if(session()->get('user_type') == "visitor") { ?>
                <input type="hidden" name="id_visitor" value="<?= $user_login['id']; ?>">
                <input type="hidden" name="nama" value="<?= $user_login['fullname']; ?>">
                <?php } else if(session()->get('user_type') == "developer") { ?>
                <input type="hidden" name="nama" value="<?= $dev['tim']; ?>">
                <?php } else if(session()->get('user_type') == "admin") { ?>
                <input type="hidden" name="nama" value="<?= $user_login['nama']; ?>">
                <?php } else {?>
                <input type="hidden" name="id_visitor" value="<?= $user_login['id']; ?>">
                <input type="hidden" name="nama" value="<?= $user_login['nama']; ?>">
                <?php } ?>
                <textarea name="comment" id="" placeholder="comment here ... "></textarea>
                <input type="submit" value="submit">
            </form>
        </div>

        <?php foreach($forum as $data){?>
        <!--Comments Section-->
        <div class="comments-container" id="comment-<?= $data['id']; ?>">
            <div class="body">
                <div class="authors">
                    <div class="username"style="color: white;"><?= $data['nama']; ?> <span class="badge badge-primary"><?= $data['type_user']; ?></span></div>
                    <br/>
                    <img src="<?= base_url("assets/vote/img/avatar.jpg"); ?>" alt="">
                </div>
                <div class="content">
                    <br>
                    <?php if($data['reply_to'] != 0){ ?>
                        Reply to: <a href="#comment-<?= $data['reply_to']; ?>">Comment #<?= $data['reply_to']; ?></a>
                    <?php } ?>
                    <br>
                    <br>
                    <?= $data['comment']; ?>
                    <br>
                    <!-- <div class="comment">
                        <button onclick="showReply(<?= $data['id']; ?>)">Reply</button>
                    </div> -->
                </div>
            </div>
        </div>
        <?php } ?>


        <!--Another Comment With replies-->
        <!--Reply Area-->
    </div>
    <br>
    <br>  
</main>