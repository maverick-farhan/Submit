<form  onchange="submit()" action="{{ route('status.create',$task->id) }}" method="post" >
                        @csrf
                        <select name="task_status" id="task_status" class="form-control" >
                            @if($task->completed==1)
                            <option value="status" disabled >Status</option>
                            <option value="{{ $task->completed = true }}" name="completed" class="text-green-600">Completed</option>
                            @else
                            <option value="status" >Status</option>
                            <option value="{{ $task->completed = true }}" name="completed" class="text-green-600">Completed</option>
                            @endif
                        </select>
                    </form>

<script>
function sumbit() {
  document.getElementById("task_status").submit();
}
</script>

   public function status(Request $request,string $id){
    $task = DB::table('tasks')->where('id',$id)->update([
        'completed'=>true
    ]);
        return redirect()->route('root')->with('completed','Task Completed');
   }