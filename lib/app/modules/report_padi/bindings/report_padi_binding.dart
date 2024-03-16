import 'package:get/get.dart';

import '../controllers/report_padi_controller.dart';

class ReportPadiBinding extends Bindings {
  @override
  void dependencies() {
    Get.lazyPut<ReportPadiController>(
      () => ReportPadiController(),
    );
  }
}
