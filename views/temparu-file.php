<div class="mb-3">
        <label for="price" class="form-label small fw-bold">Price</label>
        <div class="input-group">
            <div class="input-group-text">$</div>
            <input type="number" name="price" id="price" class="form-control" 
            <!-- value="<?= $product_obj['price'] ?>" step="any" required> -->
        </div>
    </div>

    <div class="mb-3">
        <label for="number" class="form-label small fw-bold">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="<?= $product_obj['quantity'] ?>" step="any" required>
    </div>
