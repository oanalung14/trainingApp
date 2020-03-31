<?php
use Illuminate\Database\Eloquent\Model;

class UserTraining extends Model {
	protected $table = 'user_training';
	public $timestamps = NULL;

	public function isAlreadyEnrolled($userId, $trainingId) {
	    return $this->where('id_user', $userId)->where('id_training', $trainingId)->count() != 0;
    }

    public function getEnrolled($userId) {
	    $allTrainings = $this->select('id_training')->where('id_user', $userId)->get();

	    $trainingIds = [];
	    foreach ($allTrainings as $t){
	        $trainingIds[]=$t->id_training;
        }
	    return $trainingIds;
    }

    public function getEnrolledCount($trainingId) {
        return $this->where('id_training', $trainingId)->count();
    }
}
