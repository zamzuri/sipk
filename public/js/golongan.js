var vm = new Vue({
	el: '#GolonganController',

	methods: {

		fetchGolongan: function () {
			this.$http.get('golongan', function(data) {
				this.$set('golongan', data)
			})
		}
	},

	ready: function () {
		this.fetchGolongan()
	}
});