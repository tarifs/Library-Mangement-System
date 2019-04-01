<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Staffs
                    <span class="badge bg-info"><?php echo e($staffs->count()); ?></span>
                    </h2>
                </div>
                <div class="pull-right">
                    <div class="col-sm-12">
                        <br>
                        <a href="<?php echo e(route('staffs.create')); ?>" class="btn btn-primary"><span class="fa fa-user"></span>Add Staff</a>
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered">
                        <thead>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Degree</th>
                            <th>Rank</th>
                            <th>Email</th>
                            <th>Cell</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                            <?php if($staffs): ?>
                                <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><img width="40px" style="border-radius: 50%;" src="<?php echo e($staff->image); ?>" alt="" /></td>
                                        <td><?php echo e($staff->name); ?></td>
                                        <td><?php echo e($staff->degree); ?></td>
                                        <td><?php echo e($staff->rank); ?></td>
                                        <td><?php echo e($staff->email); ?></td>
                                        <td><?php echo e($staff->cell); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('staffs.edit', $staff->id)); ?>" class="btn btn-xs btn-dark">Edit</a>

                                            
                                            <form class="" action="<?php echo e(route('staffs.destroy', $staff->id)); ?>" method="post">
                                        <?php echo e(csrf_field()); ?> <?php echo e(method_field('delete')); ?>

                                        <input class="btn btn-xs btn-danger" type="submit" name="" value="Delete">
                                      </form>
                                         </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script type="text/javascript">
    function deleteStaff(id) {
        const swalWithBootstrapButtons = swal.mixin({
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
      })

        swalWithBootstrapButtons({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true
      }).then((result) => {
          if (result.value) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
        } else if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.cancel
    ) {
            swalWithBootstrapButtons(
              'Cancelled',
              'Your data is safe :)',
              'error'
              )
        }
    })
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>