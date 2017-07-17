<div class="col-md-2">

</div>

<div class="col-md-8">

    <?php if( $this->Flash->render() ): ?>
        <div class="alert alert-danger">
            <?= h($errorMsg) ?>
        </div>
    <?php endif; ?>

    <div class="jumbotron">
        <form method="post" action="authenticate">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-md-12">
                <button class="btn btn-success btn-md pull-right">Login</button>
            </div>
        </form>
    </div>
</div>

<div class="col-md-2">

</div>