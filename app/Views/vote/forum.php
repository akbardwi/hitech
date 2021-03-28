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
                    Silhakan Jawab pertanyaan yang diberikan untuk mendapatkan koin dari  <?= $dev['tim']; ?>
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
                <input type="hidden" name="id_dev" value="<?= $dev['id']; ?>">
                <input type="hidden" name="type_dev" value="<?= $dev['type']; ?>">
                <?php if(session()->get('user_type') == "visitor") { ?>
                <input type="hidden" name="id_visitor" value="<?= $user_login['id']; ?>">
                <input type="hidden" name="nama" value="<?= $user_login['fullname']; ?>">
                <?php } else if(session()->get('user_type') == "developer") { ?>
                <input type="hidden" name="nama" value="<?= $dev['tim']; ?>">
                <?php } else if(session()->get('user_type') == "admin") { ?>
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
                    <div class="username"style="color: white;"><?= $data['nama']; ?> <span class="badge badge-<?php if($data['type_user'] == "developer"){ echo "success"; } else if($data['type_user'] == "visitor"){ echo "primary"; } else { echo "warning"; } ?>"><?= $data['type_user']; ?></span></div>
                    <br/>
                    <img src="<?= base_url("assets/vote/img/avatar.jpg"); ?>" alt="">
                    <div>Points:</div>
                    <div class="rate">
                        <?php if(session()->get('user_type') == "developer" and $data['type_user'] == "visitor" and $data['rate'] == 0) { ?>
                        <form action="<?= base_url("users/rate"); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <input type="hidden" name="id_visitor" value="<?= $data['id_visitor']; ?>">
                            <table>
                                <td>
                                    <img src="<?= base_url("assets/vote/img/logo1.png"); ?>" style="width: 30px; height: 30px;">
                                </td>
                                <td>
                                    <!-- <input type="number" id="quantity" name="quantity" min="1" max="5"> -->
                                    <select name="quantity" id="">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <input type="submit">
                                </td>
                            </table>
                        </form>
                        <?php } else { 
                            for($a=0; $a<$data['point']; $a++){ ?>
                                <img src="<?= base_url("assets/vote/img/logo1.png"); ?>" style="width: 30px; height: 30px;">
                        <?php } 
                        }?>
                    </div>
                </div>
                <div class="content">
                    <br>
                    <div class="container">
                        <div class="comment">
                            <?php if($data['reply_to'] != 0){ ?>
                            Reply to: <a href="#comment-<?= $data['reply_to']; ?>">Comment #<?= $data['reply_to']; ?></a>
                            <?php } ?>
                            <textarea class="textinput" readonly><?= $data['comment']; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="comment">
                        <button onclick="showReply(<?= $data['id']; ?>)">Reply</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Reply Area-->
        <div class="comment-area hide" id="reply-area-<?= $data['id']; ?>">
            <form action="<?= base_url("users/post_comment"); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_dev" value="<?= $dev['id']; ?>">
                <input type="hidden" name="type_dev" value="<?= $dev['type']; ?>">
                <?php if(session()->get('user_type') == "visitor") { ?>
                <input type="hidden" name="id_visitor" value="<?= $user_login['id']; ?>">
                <input type="hidden" name="nama" value="<?= $user_login['fullname']; ?>">
                <?php } else if(session()->get('user_type') == "developer") { ?>
                <input type="hidden" name="nama" value="<?= $dev['tim']; ?>">
                <?php } else if(session()->get('user_type') == "admin") { ?>
                <input type="hidden" name="nama" value="<?= $user_login['nama']; ?>">
                <?php } ?>
                <input type="hidden" name="reply_to" id="reply_to" value="<?= $data['id']; ?>">
                <textarea name="comment" id="" placeholder="reply here ... "></textarea>
                <input type="submit" value="submit">
            </form>
        </div>
        <?php } ?>


        <!--Another Comment With replies-->
        <!--Reply Area-->
    </div>
    <br>
    <br>  
</main>