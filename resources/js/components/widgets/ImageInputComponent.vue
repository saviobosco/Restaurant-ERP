<template>
    <div>
        <div
            class="img-preview text-center">
            <img v-if="url" :src="url" />
        </div>
        <input type="file" class="custom-file-input" capture
               @change="onFileChange"
               >
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: null,
        };
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        }
    }
}
</script>

<style>
.img-preview {
    height: 120px;
    width: 120px;
    border:1px solid gray;
    border-radius: 5px;
    display: inline-block;
}
.img-preview img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    object-position: bottom;
}

.custom-file-input {
    color: transparent;
}
.custom-file-input::-webkit-file-upload-button {
    visibility: hidden;
}
.custom-file-input::before {
    content: 'Select some files';
    color: black;
    display: inline-block;
    background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
    border: 1px solid #999;
    border-radius: 3px;
    padding: 5px 8px;
    outline: none;
    white-space: nowrap;
    -webkit-user-select: none;
    cursor: pointer;
    text-shadow: 1px 1px #fff;
    font-weight: 700;
    font-size: 10pt;
}
.custom-file-input:hover::before {
    border-color: black;
}
.custom-file-input:active {
    outline: 0;
}
.custom-file-input:active::before {
    background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
</style>
