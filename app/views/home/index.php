<?php $this->view("layout/header");?>

    <div class="container d-flex flex-column  align-items-center pt-5">
        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Text</label>
                <input type="text" class="form-control" name="text" >
                <div id="emailHelp" class="form-text">Type something.</div>
            </div>
            <div class="mb-3">
                <label for="selects the strategy" class="form-label">Select the strategy</label>
                <select class="form-select" name="strategy" >
                    <option selected value="">-- select --</option>
                    <option value="Bubble Sort">BubbleSort</option>
                    <option value="Quick Sort">QuickSort</option>
                    <option value="Merge Sort">MergeSort</option>
                </select>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if(!empty($data['error'])): ?>
            <div class="mt-5 text-danger"> <?= $data['error'] ?> </div>
        <?php endif ?>

        
        <?php if(!empty($data['strategy'])): ?>
        <div class="mt-5 bg-light p-5 rounded">
            <h3><?= $data['strategy'] ?></h3>
            <hr>
            <h5>Before</h5>
            <p><?= $data['original'] ?></p>
            <h5>After</h5>
            <p><?= $data['sorted'] ?></p>
        </div>
        <?php endif ?>
    </div>


<?php $this->view("layout/header");?>