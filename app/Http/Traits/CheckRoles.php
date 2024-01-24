<?

namespace App\Http\Traits;

use App\Models\User;

trait CheckRoles
{
    public function isAdminApp()
    {
        if ($this->roles[0]->id == User::ADMIN_APP) {
            return true;
        }
        return false;
    }

    public function isMakeupBos()
    {
        if ($this->roles[0]->id == User::MAKEUP_BOS) {
            return true;
        }
        return false;
    }

    public function isMember()
    {
        if ($this->roles[0]->id == User::MEMBER) {
            return true;
        }
        return false;
    }
}
