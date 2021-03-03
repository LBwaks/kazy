protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_no' => ['required', 'string', 'min:6','max:10'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tell' => ['required', 'string', 'min:10','max:10'],
            'gender' => ['required', 'string', 'min:4','max:6'],
            'dob' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'profile_image'=>['sometimes','mimes:jpeg,png,jpg|max:2048|nullable']
            // 'profile_image'=>['string']


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(request()->hasFile('profile_image')){
            $file=request()->file('profile_image');
            $name=uniqid().".".$file->getClientOriginalExtension();
            $file->move('images/profile/',$name);
            return User::create([

                'id_no'=>$data['id_no'],
                'name' => $data['name'],
                'email' => $data['email'],
                'tell'=>$data['tell'],
                'gender'=>$data['gender'],
                'dob'=>$data['dob'],
                'location'=>$data['location'],
                'address'=>$data['address'],
                'profile_image'=>'/images/profile/'.$name,
                'password' => Hash::make($data['password']),
            ]);
        }
        return User::create([

            'id_no'=>$data['id_no'],
            'name' => $data['name'],
            'email' => $data['email'],
            'tell'=>$data['tell'],
            'gender'=>$data['gender'],
            'dob'=>$data['dob'],
            'location'=>$data['location'],
            'address'=>$data['address'],
            'password' => Hash::make($data['password']),
        ]);