<main class="container login-container">
    <img src="<?= BASEURL ?>/img/logo.png" alt="Logo" class="login-logo">

    <form action="<?= BASEURL ?>/login/login" method="post">
        <div class="input-group mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="input-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="input-group mb-3">
            <label for="userType" class="form-label">User Type</label>
            <select class="form-select" id="userType" name="userType" required>
                <option value="staff">Staff</option>
                <option value="patron">Patron</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</main>