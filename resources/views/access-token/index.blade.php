<x-app-layout>
    <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <x-jet-adminlte::widget.card class="card-outline card-primary" nopadding="true">
                <x-slot name="header">
                    <h3 class="card-title">
                        <i class="fa fa-key"></i>
                        {{ JetAdminLte::title() }}
                    </h3>
                </x-slot>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            名前
                        </td>
                        <td class="text-right">
                            <submit class="btn btn-sm btn btn-outline-danger">
                                削除
                            </submit>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </x-jet-adminlte::widget.card>
        </div>
    </div>
</x-app-layout>
