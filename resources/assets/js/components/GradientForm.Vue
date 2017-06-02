<template>
    <div>
        <div class="form-group">
            <label for="filename">File name</label>
            <input type="text" class="form-control" name="filename" autofocus required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
        <hr>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
