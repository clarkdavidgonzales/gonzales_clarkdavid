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
        <?php foreach(html_escape($students) as $student): ?>
        <tr>
            <td>
                <a href="<?=site_url('user/update/'.$student['id']);?>">Update</a>
                
                <a href="<?=site_url('user/soft-delete/'.$student['id'] . '/' . $current_page);?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="<?=site_url('user/create');?>">Create Record</a></p>

    <div class="pagination">
        <?php 
        // 'Previous' button
        if ($current_page > 1): ?>
            <a href="<?=site_url('user/show/'.($current_page - 1));?>">« Prev</a>
        <?php endif; ?>

        <?php 
        // Numeric page links
        for ($i = 1; $i <= $total_pages; $i++): ?>
            <?php if ($i == $current_page): ?>
                <strong style="padding: 5px; border: 1px solid #ccc;"><?=$i;?></strong>
            <?php else: ?>
                <a href="<?=site_url('user/show/'.$i);?>" style="padding: 5px;"><?=$i;?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php 
        // 'Next' button
        if ($current_page < $total_pages): ?>
            <a href="<?=site_url('user/show/'.($current_page + 1));?>">Next »</a>
        <?php endif; ?>
    </div>
    <p>Page <?=$current_page;?> of <?=$total_pages;?>.</p>
</body>
</html>