<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">
</head>
<body>
    <h1>Showdata View</h1>
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
    
    <br>
    
    <div class="pagination-container">
        <?php if (isset($pager)) : ?>
            <?= $pager->links() ?>
        <?php endif ?>
    </div>
    
    <a href="<?=site_url('user/create');?>">Create Record</a>
</body>
</html>
