<main class="main-content library-page">
    <div class="community-card" style="max-width: 600px; margin: 0 auto;">
        <h2>Edit Profile</h2>
        <form action="update-profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user_profile['name']); ?>">
            </div>
            <div class="form-group">
                <label>Bio</label>
                <textarea name="bio"><?php echo htmlspecialchars($user_profile['bio']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Profile Picture</label>
                <input type="file" name="avatar">
            </div>
            <button type="submit" class="btn-primary">Save Changes</button>
        </form>
    </div>
</main>