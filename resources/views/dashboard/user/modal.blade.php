<x-Modal :id="$postulacione->id.'-eliminar'" title="Eliminar Postulacion" theme="danger" icon="far fa-trash-alt" send=true route="dashboard.postulaciones.destroy" method="delete" :parameter="$postulacione->id">
    <p>¿Esta seguro que desea elminar este registro?</p>
</x-Modal>