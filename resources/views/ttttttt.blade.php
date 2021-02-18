<!-- Default radio -->
<div class="form-check">
    <input
      class="form-check-input"
      type="radio"
      name="flexRadioDefault"
      id="flexRadioDefault1"
    />
    <label class="form-check-label" for="flexRadioDefault1"> Default radio </label>
  </div>

  <!-- Default checked radio -->
  <div class="form-check">
    <input
      class="form-check-input"
      type="radio"
      name="flexRadioDefault"
      id="flexRadioDefault2"
      checked
    />
    <label class="form-check-label" for="flexRadioDefault2"> Default checked radio </label>
  </div>
  Jjjjjjkkkkkk
  Vvvvvvbbbbbbbb
  <!-- Default checkbox -->
  <div class="form-check">
    <input
      class="form-check-input"
      type="checkbox"
      value=""
      id="flexCheckDefault"
    />
    <label class="form-check-label" for="flexCheckDefault">
      Default checkbox
    </label>
  </div>

  <!-- Checked checkbox -->
  <div class="form-check">
    <input
      class="form-check-input"
      type="checkbox"
      value=""
      id="flexCheckChecked"
      checked
    />
    <label class="form-check-label" for="flexCheckChecked">
      Checked checkbox
    </label>
  </div>
  Vvvvvvvvvvvvv

  $job=Job::findOrFail($application);
  return view('applications.create',compact('job'));

  $request->validate([
            'charge'=>'required|numeric',
            'duration'=>'required|numeric',
            'time'=>'required'
        ]);
        $duration='duration'.' '.'time';
        $application=$job->applications()->create(['charge'=>$request->price,$duration=>$request->duration,'user_id'=>\Auth::id()]);
        if($bid)
        {
            // $user=$job->user;
            // $user->notify(new NewBid($bid));
            return redirect()->route('bids.myBids')->with('success','Bid Successful!');

        }
        else{
            return redirect()->route('jobs.show')->with('failure','FAILED');
        }
        llllllllllllllllllllllllllllllllllllllllllllllll
        protected $fillable=['price','user_id'];

        //user relationship
        public function user()
      {
        return $this->belongsTo('App\User');
      }

      //job relationship
      public function job()
      {
        return $this->belongsTo('App\Job');
      }
      public function getUrlAttribute()
      {
          return route('bids.show',$this->id);
      }
      public function getCreatedDateAttribute()
      {
          return $this->created_at->diffForHumans();
      }
    //   public function approve(Bid $bid){
    //     $this->approved=$bid->{"Approved"};
    //     $this->save();
    //   }
      public function approvedBid(Bid $bid){
    $yes="Approved";
        $this->approved=$bid=$yes;
        // $updateBid=DB::table('bids')->where("bid",$bid)->update('approved','yes ')
        $this->save();
      }
      llllllllllllllllllllllllllllllllllllllllllllllll
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('job_id');
      $table->string('charge');
      $table->string('duration');
      $table->string('approved')->default('No');
      $table->softDeletes();
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
