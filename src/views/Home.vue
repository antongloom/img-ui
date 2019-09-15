<template>
  <div class="Home">
    	<input type="file" @change="onFileSelected">
    	<input type="submit" @click="onUpload">
    		<div>
    			{{picters}}
    		</div>
  </div>
</template>

<style lang="stylus" scoped>
	.Home
		max-width 900px
		margin 100px auto
</style>
<script>
import axios from 'axios'

export default {
  username: 'home',
  data: () => ({
  	selectedFile: null,
  	picters: []
  }),
  mounted() {
  		this.getAllImg()
  },
  methods: {
  	onFileSelected(event) {
  		this.selectedFile = event.target.files[0]
  	},
  	onUpload() {
  		const fd = new FormData()
  		fd.append('img', this.selectedFile, this.selectedFile.name)
  		
  		axios.post('http://antongek.beget.tech/index.php',fd)
  			.then(res => {console.log(res)})
  	},
  	getAllImg() {
  		axios 
      .get("http://antongek.beget.tech/view.php")
      .then(response => {
      	if(response.data.error) {
      		 this.errorMessage = response.data.message
      	} else {
      		this.picters = response.data.picters
      		console.log(this.picters)
      	}
      })
  	},
  }
}
</script>

