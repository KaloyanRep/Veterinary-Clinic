<table class="table table-bordered">
    <thead>
    <tr>
        <th class="col-md-2">Name</th>
        <th lass="col-md-7">Address</th>

    </tr>
    </thead>
</table>
@foreach($clinics as $clinic)
    <form action="{{ url('$clinics-update', [$clinic->id]) }}" method="PUT">
        <table id="add-me" class="table table-bordered">
            <tbody class="table-container">
            <tr>
                <td class="col-md-2">
                    <input type="text" name="quantity" class="form-control"
                           value="{{ $clinic->name }}" disabled="" />
                </td>
                <td class="col-md-7">
                    <input type="text" name="description" class="form-control"
                           value="{{ $product->address }}" disabled="" />
                </td>

                <td class="col-md-1">
                    <button type="button" class="btn btn-info edit">
                        Edit</button>
                    <button type="submit" class="btn btn-success update">
                        Update</button>

                </td>
            </tr>

            </tbody>
        </table>
    </form>
@endforeach

