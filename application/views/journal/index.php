<div class="row">
    <section class="span12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><button class="btn btn-mini btn-inverse"><i class="icon-arrow-down icon-white"></i></button> ID</th>
                    <th><button class="btn btn-mini btn-inverse"><i class="icon-arrow-down icon-white"></i></button> Date</i></button></th>
                    <th>Description</th>
                    <th>Record</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="5">
                        <div class="pagination pagination-small">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            </tfoot>
            <?php foreach($journals as $journal): ?>
            <tr>
                <td><?php echo $journal->id; ?></td>
                <td><?php echo $journal->date; ?></td>
                <td><?php echo $journal->description;  ?></td>
                <td><a href="">File Name</a></td>
                <td>
                     <div class="btn-group">
                        <button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                            	<a href="/journal/edit/<?php echo $journal->id; ?>" class=""><i class="icon-edit"></i> Edit</a>
                            </li>
                            <li>
                            	<a href="/journal/delete/<?php echo $journal->id; ?>" class=""><i class="icon-remove"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</div>