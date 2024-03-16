import 'package:get/get.dart';

import '../models/users.dart';

class AccountController extends GetxController {
  @override
  void onReady() {
    User(id: "1", name: "Gusti Adithiya", username: "gusti81");
    super.onReady();
  }
}
