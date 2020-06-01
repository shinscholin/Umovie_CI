<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMovieModal">Add New Movie</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Synopsys</th>
                        <th scope="col">Durasi</th>
                        <th scope="col">Trailer</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($judul as $j) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $j['judul']; ?></td>
                        <td><?= $j['sinopsis']; ?></td>
                        <td><?= $j['durasi']; ?></td>
                        <td><?= $j['trailer']; ?></td>
                        <td>
                            <a href="" class="badge badge-success">edit</a>
                            <a href="" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newMovieModal" tabindex="-1" role="dialog" aria-labelledby="newMovieModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMovieModal">Add New Movie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('movie'); ?>" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name="Judul" placeholder="Movie title">
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" id="sinopsis" name="Sinopsis" placeholder="Synopsys">
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" id="durasi" name="Durasi" placeholder="Durasi">
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" id="trailer" name="Trailer" placeholder="Trailer">
                    </div>
                </div>
                <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
          
                </div>
            </form>
        </div>
    </div>
</div> 