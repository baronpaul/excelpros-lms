<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="btns_wrap">
      <a href="{{ route('admin.exams.index') }}" class="btn btn-info">Active Tests</a>
      <a href="{{ route('admin.exams.completed') }}" class="btn btn-info">Completed Tests</a>
      <a href="{{ route('admin.exams.inactive') }}" class="btn btn-info">Inactive Tests</a>
      <a href="{{ route('admin.exams.select') }}" class="btn btn-info">Add New Test</a>
    </div>
</div>

<div class="col-md-6">
    <form action="{{ route('admin.exams.filter_exam') }}" method="GET">
        <div class="row">
            <div class="col-md-8">
                <select name="program_id" class="form-control input-sm">
                    <option>Select Training Program</option>
                    @foreach($training_programs as $training_program)
                        <option value="{{ $training_program->program_id }}">{{ $training_program->program_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 no-padding">
                <button type="submit" class="btn btn-info">Filter</button>
                <a href="{{ route('admin.exams.index') }}" class="btn btn-info">Clear</a>
            </div>
        </div>
    </form>
</div>