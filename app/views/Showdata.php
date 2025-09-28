<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">
</head>
<body>
    <h1>Student Records</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach(html_escape($students) as $student): ?>
        <tr>
            <td><?=$student['id'];?></td>
            <td><?=$student['last_name'];?></td>
            <td><?=$student['first_name'];?></td>
            <td><?=$student['email'];?></td>
            <td>
                <a href="<?=site_url('user/update/'.$student['id']);?>">Update</a>
                <a href="<?=site_url('user/soft-delete/'.$student['id']);?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="<?=site_url('user/create');?>">Create Record</a></p>

    <div class="pagination">
        <?php 
        // Display a "Previous" link
        if ($current_page > 1): ?>
            <a href="<?=site_url('user/show/'.($current_page - 1));?>">Previous</a>
        <?php endif; ?>

        <?php 
        // Loop through all pages
        for ($i = 1; $i <= $total_pages; $i++): ?>
            <?php if ($i == $current_page): ?>
                <strong><?=$i;?></strong>
            <?php else: ?>
                <a href="<?=site_url('user/show/'.$i);?>"><?=$i;?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php 
        // Display a "Next" link
        if ($current_page < $total_pages): ?>
            <a href="<?=site_url('user/show/'.($current_page + 1));?>">Next</a>
        <?php endif; ?>
    </div>
    <p>Page <?=$current_page;?> of <?=$total_pages;?>.</p>

</body>
</html>