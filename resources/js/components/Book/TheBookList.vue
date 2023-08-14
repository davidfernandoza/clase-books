<template>
	<section>
		<div class="card">
			<div class="card-header d-flex justify-content-end">
				<button class="btn btn-primary" @click="openModal">Crear libro</button>
			</div>
			<div class="card-body">
				<div class="table-responsive my-4 mx-2">
					<table class="table table-bordered" id="book_table">
						<thead>
							<tr>
								<th>Titulo</th>
								<th>Autor</th>
								<th>Categoria</th>
								<th>Cantidad</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(book, index) in books" :key="index">
								<td>{{ book.title }}</td>
								<td>{{ book.author.name }}</td>
								<td>{{ book.category.name }}</td>
								<td>{{ book.stock }}</td>
								<td>
									<button class="btn btn-primary">hola</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div>
				<book-modal :authors_data="authors_data" />
			</div>
		</div>
	</section>
</template>

<script>
import BookModal from './BookModal.vue';

export default {
	components: {
		BookModal
	},
	props: ['books', 'authors_data'],
	data() {
		return {
			modal: null,
			book: null
		}
	},
	mounted() {
		this.index()
	},
	methods: {
		async index() {
			$('#book_table').DataTable()
			const modal_id = document.getElementById('book_modal')
			this.modal = new bootstrap.Modal(modal_id)
			modal_id.addEventListener('hidden.bs.modal', e => {
				alert('hola')
				// this.$refs.book_modal.reset()
			})
		},
		openModal() {
			this.modal.show()
		},
		closeModal() {
			this.modal.hide()
		}
	}
}
</script>


