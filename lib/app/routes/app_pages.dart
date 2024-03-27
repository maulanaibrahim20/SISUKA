import 'package:get/get.dart';

import 'package:project_sintren/app/modules/account/bindings/account_binding.dart';
import 'package:project_sintren/app/modules/account/views/account_view.dart';
import 'package:project_sintren/app/modules/coba/bindings/coba_binding.dart';
import 'package:project_sintren/app/modules/coba/views/coba_view.dart';
import 'package:project_sintren/app/modules/home/bindings/home_binding.dart';
import 'package:project_sintren/app/modules/home/views/home_view.dart';
import 'package:project_sintren/app/modules/landing/bindings/landing_binding.dart';
import 'package:project_sintren/app/modules/landing/views/landing_view.dart';
import 'package:project_sintren/app/modules/login/bindings/login_binding.dart';
import 'package:project_sintren/app/modules/login/views/login_view.dart';
import 'package:project_sintren/app/modules/report_padi/bindings/report_padi_binding.dart';
import 'package:project_sintren/app/modules/report_padi/views/report_padi_view.dart';
import 'package:project_sintren/app/modules/report_palawija/bindings/report_palawija_binding.dart';
import 'package:project_sintren/app/modules/report_palawija/views/report_palawija_view.dart';

// ignore_for_file: constant_identifier_names

part 'app_routes.dart';

class AppPages {
  AppPages._();

  static const INITIAL = Routes.HOME;

  static final routes = [
    GetPage(
      name: _Paths.HOME,
      page: () => const HomeView(),
      binding: HomeBinding(),
    ),
    GetPage(
      name: _Paths.LANDING,
      page: () => const LandingView(),
      binding: LandingBinding(),
    ),
    GetPage(
      name: _Paths.REPORT_PADI,
      page: () => const ReportPadiView(),
      binding: ReportPadiBinding(),
    ),
    GetPage(
      name: _Paths.REPORT_PALAWIJA,
      page: () => const ReportPalawijaView(),
      binding: ReportPalawijaBinding(),
    ),
    GetPage(
      name: _Paths.ACCOUNT,
      page: () => const AccountView(),
      binding: AccountBinding(),
    ),
    GetPage(
      name: _Paths.LOGIN,
      page: () => const LoginView(),
      binding: LoginBinding(),
    ),
    GetPage(
      name: _Paths.COBA,
      page: () => const CobaView(),
      binding: CobaBinding(),
    ),
  ];
}
