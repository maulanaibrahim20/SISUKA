import 'package:get/get.dart';

import '../controllers/report_palawija_controller.dart';

class ReportPalawijaBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut<ReportPalawijaController>(
      () => ReportPalawijaController(),
    );
  }
}
