<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showdata</title>
    <link rel="stylesheet" href="<?=base_url();?>/public/css/style.css">

    <style>
        /* Simple styling to make the pagination links look neat */
        .pagination {
            margin-top: 20px;
            padding: 10px 0;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .pagination a, .pagination strong {
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .pagination strong {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <h1>Student Data</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lastname</th>
                <th>Firstname</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Check if $students is an array and not empty before looping
            if (!empty($students) && is_array($students)): 
                foreach(html_escape($students) as $student): 
            ?>
            <tr>
                <td><?=$student['id'];?></td>
                <td><?=$student['last_name'];?></td>
                <td><?=$student['first_name'];?></td>
                <td><?=$student['email'];?></td>
                <td>
                    <a href="<?=site_url('user/update/'.$student['id']);?>">Update</a>
                    
                    <a href="<?=site_url('user/soft-delete/'.$student['id'] . '/' . $current_page);?>" 
                       onclick="return confirm('Are you sure you want to soft delete this record?')"
                       style="color: red;">Delete</a>
                </td>
            </tr>
            <?php 
                endforeach; 
            else:
            ?>
            <tr>
                <td colspan="5">No student records found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <p><a href="<?=site_url('user/create');?>">Create Record</a></p>

    <div class="pagination">
        <?php 
        // 'Previous' button
        if ($current_page > 1): ?>
            <a href="<?=site_url('user/show/'.($current_page - 1));?>">« Previous</a>
        <?php endif; ?>

        <?php 
        // Numeric page links
        for ($i = 1; $i <= $total_pages; $i++): ?>
            <?php if ($i == $current_page): ?>
                <strong><?=$i;?></strong>
            <?php else: ?>
                <a href="<?=site_url('user/show/'.$i);?>"><?=$i;?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php 
        // 'Next' button
        if ($current_page < $total_pages): ?>
            <a href="<?=site_url('user/show/'.($current_page + 1));?>">Next »</a>
        <?php endif; ?>
    </div>
    <p>Displaying records on Page <?=$current_page;?> of <?=$total_pages;?>.</p>
    </body>
</html>
