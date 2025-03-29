<?php

namespace Database\Seeders;

use App\Models\Room;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Wishlist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $images = [
            'https://lh3.googleusercontent.com/proxy/2PozUK8X9lfIOMIrJnjxVzhonI89dfNaJv9rAgZoC9lHLrziPgXl18GRqzWAcR647jOodqzGbO6OG1FyKHLwf6qOblhUwf14pjcX-bvkQZ7eWIH07FkWX65dxt1xsFmYl8T5JR4KFqB-y0pjg2qT1uEEPw5vBp4=w122-h64-n',
            'https://lh6.googleusercontent.com/proxy/Rbasv2Wjgv41r4bibp-obe9W_ojsljJBX4nG9pF6aOXIWSifn-TZHd0AsI4tr3zqz26s-ps7DROgsqOat5Gx2bocI3gvwt5h4q5lEWDjGhJ7ETB3yhW5aqvQ1h_70luNJIcszX3WgjkSwlMMDSJSR8Xw2rAlTw=w122-h64-n',
            'https://lh5.googleusercontent.com/proxy/B0DxiQ9P_r6E2jS_IO-pBhFCMKiFnEmOKf95yJa3gSFmjHoQiINoZ493l5nTBnQnJRzVR8ugSJmf-dKrufmcepHoixaJ_KQ-zKGBr7iuntoGQ3G7U6BOoH1K2KY4QEcOWz9QaSHGfHobBStXhY_ZHv19aQ3bXU8=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/nT_F4EHcmWsrSzg2huqIrywmsRuV8t-bJtDQw3_wXbvtYcZuWvGz4FLhVB-OassEnlAmogw-Hz8c3U2jKPDP7l-oT57meUNGc8dj5iIAZUKe3tIaMLdhhjFRj_jvackcV8HTCmEQUNB2yrAEwiAymvLaVQoRSOk=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/Eh1T7Q4EEmRwASbwSPw0DJi0KMHno39F7ey7sOEP9W9lMR614y3FMqlYzkzPAXkkRlLcAqTEgDRAdj6TmH5SFCeJdlxoNN5Irx-r6LZLzzn0Nlt5r54H3AXK9I5R8QR59Dligs_n2t2-yBGr2djCAF4v2bsb-A=w122-h64-n',
            'https://lh6.googleusercontent.com/proxy/feoFAsRq6_kdUVWIRJKcnH1wBjM2lNLVG4bddzwBuNSJaF-sp0nzOhNRIAV4qKcsYG5Zi1nBmHxHEBOhqnPOi5NK-0SMf7us52eqW9irMBtlykjIDFFcQDuklixPCkL_Yu965JWCbLlLXD6jswCdtcERlWtgLQ=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/BuLtfOG6MiSyj6X-xsUK7YH-9gC2BK-7XJhx2wmZXEw_5hntXtgaCZvLXlBaLDClNjZl4HW_rsJzgd73YGgrJ8tHPGcF2eMu7uweTXXiCVMYkqr5xe_S6VBo2FxngRrcQjaQeYrD90-Tqr6BJthT9nUNlEclTyY=w122-h64-n',
            'https://lh5.googleusercontent.com/proxy/IWDxDWdbOpPZFJQCBnmxFJXbJoEk9hCd6T-vOyyquuHVAi43AHAxXel6PyKGs9OP4emV24HuiYpmR3r6F_r1HPHBn_rBXiskNxTmZTJprhkGpQdIV4VkrTqR3We7rtDCG2dxKOKHzwa423BEcuK5DsZgCd_sKA0=w122-h64-n',
            'https://lh6.googleusercontent.com/proxy/ulWrNE4MdQuWD-EofHL0u-ZOZeOLje6gAFO7l96wLZGTlfzb9eKFWKZyUaKMfO2HtGJhZeFrfODC8Pbu_giuCeh7FwlOLqf7mcMyrNu_hU88j93oqjDVCco-Dr70OUq8wE4MGJY9PdOhV96AWW5oNOGoabAe3A=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/KI2dcvpGh13v_j3jBXqBjKxU8EStkz9Oh1yYofg-k0lfaQuSvgznJoNH74W5JkJ2bjtteJ-TGVBRFb-c8Q6ddShoPuQcqyzj0tojlGwxX1BiMQc_YMCLPd2ByCKDGy9aQs7TOjWOfNCORro1fFGbzj0vUGQl3A=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/82aImyUu83tpm5pxPAKOmJWUhjlRI3yH3fjDLXn0W7ESvltIHfc2E-hsHR_wgKxsZa_UzOUpIOP_ydQcyNnwlmpxZuCNgtuOdI-LWMmtJnS-GVxsqQWu2MmTSXWCf9Pc42ZjeA0BpqsNfNULVUsWfpyALCa90bs=w122-h64-n',
            'https://lh3.googleusercontent.com/proxy/gn1eV3Auw98HdE52ejFmSQmNLYFjLP-IE_Txk7ZYBtf0WDs9JREGkMMlVpoBGnsMHxo5ax1S-wNaXKKNwzYV1rGoGDgdxghkER33ihTJ8t4uu_FvgitO20HVQpFs1v9IJGjOof3svOcfMBxPbD8pA1g5GlXWIg=w122-h64-n',
            'https://lh6.googleusercontent.com/proxy/gYxXFulQfKSmNUrYNvMDCnonIv6qPPAkbAzxJ1FGsh0IKuoiUZaUDgC7gSxJiWJuWDcdfoyYrIxNrKAm-jOC4CSrtx63injO06t8NA5brNP6rwnSd7OSAJP_IrlL-nzIIC6wGiZfsTDhqhSseFyrmihMXsd1_A=w122-h64-n',
            'https://lh3.googleusercontent.com/proxy/V4JXhwFm3xPOJfzco5zK_D9zLQ35HpO74bN7pR27CpAOq-sB5KDdCZj2EXmPdCnt67nlNMQHLX4KHqAvDup4odDV4IpFIwhed3b1vznU2nctt5By9YhaK2CQTDrOrptlTCMsHNteLC6wSfxZlklXOhhIXLeUhjo=w122-h64-n',
            'https://lh3.googleusercontent.com/proxy/jd37yPuBbx3xn_KcJQXpF6Ibl29kdJzJuIyEB9xrREltxi0kgsVYjm6tQ4wyX-k5f1kVu4AktK9pLQg91clFuGtdpt9kvWet1kzKxwhjgbzSaGZ3gwlLoEbFRhQaF4lIWchekgiaHds77KmBfYKqoat_5d6oyOo=w122-h64-n',
            'https://lh3.googleusercontent.com/proxy/BRMYuZdTZJ4ENCnmltjlqE3Dr5UTimHyXvw8BFuiXOoA57nFVDlhf6_zMpsleyFyAomaOS8ZFzRReBEbOfVUPEKz4Ub51w23adS0QdS5dCvgqJuvkNncXxznw2D0Eqx7BHVcGHgY3FEXRvLcJFUl3v2R4TErTA=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/xk7Y2kgprOIEwPy82WkUFg9wgTP9IMl5Getg5-_Wlh1GO3G3UtY2Qau5V_ZEEJ_AhElyQI5MuaK4o_Ri-3uK6xk5xMTF29L9RnKdr42YpYvUDaFqPUAK9KuHUSZuwLu7I2jnoFzd4zs5ONfiIrYX2R_QfWb7IQ=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/K5bD354p6aWWM-cVeckIwv73nDKYOyQeAoof2rw1ueA_34aKdLbr7TZL0pTsNCR2pLHznFZb5e5O0hRn5YSw7XfA8thC58Hxwv49FyA32uW6ZpoNjeDvk2xgv50Izm8_-6LpwGEQ_UKQzFvAbTnFWeLg7D_FfA=w122-h64-n',
            'https://lh3.googleusercontent.com/proxy/qPqwNufB3VR04ZGQ0ktx2sTa7rDBbxOr3Pt1cixgKCyV_VTVdP73tK1zsz-RlO1dVHdRd5HqSLCj6LIiz--KaYVauel8HQVHn1SJPm_Uw7VxksRWVSBO4ZCGu5yCnZhtuCBUThh3ryjIJpI0e4rK2SjFCaKPdMA=w122-h64-n',
            'https://lh5.googleusercontent.com/proxy/JUhf-KvcIUng92-yJSOpSEIvq0Qs_9P98AfRmNjN4WF7E5j7ZaQa6ko6jsomxvKLScBmO4cZqZ6V74ZYWbtTE9AedYP_zPBGBTt-ZXgVGSRTJlR_HK6FqNzTd48I8dGGtuBIlQktwLRwhymoWNdnbyJz1xhCoA=w122-h64-n',
            'https://lh3.googleusercontent.com/proxy/bOL0ttu8-QbCw4Dlj-3YtSp3VVNgB8kXj1HORNezsz2Ut-VMeiJfSL01jIwi7zKVS7ZJHYZMd0KlwRmqptD-HAxd2yI6BjbCzNGWoPPsuOzwFa034IGhR2Tu4Z-m4EM8q2dJSNcZYBuEGyuN0PAtw0fyUiJKEOs=w122-h64-n',
            'https://lh6.googleusercontent.com/proxy/kcRnSVU2qtO7ZJEuJR_VwNZpUelyFQZmysjrjdJQXluFkC-s0xDg8yBHZUD2gPalzyKwNPPSB5SEJZDw5B6hc78mf1lyoHWC3BtwOQYXmQB03okWCmiCFVMOSoIcSmpWSeCDlJpbraHR5zPhn2ZyN6pKjSgLmg=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/jj9c0xpHapAkGRGLtSdbDCXYfey0mxeRBJErT490sT2ALJhcMlPCXYZpt8FRE4_3809idCVRMqxODatTrd2KiVFSjQXvcRR9AMZzkAXRVzLID3JXDM_AKCQEahdbURXYPebVR3rT0hrm7S5yUOG7y-eix-0i7N8=w122-h64-n',
            'https://lh4.googleusercontent.com/proxy/psKMI9oOQCvN526EjanX7n1NpvnhQCd3Fb39Ae5Z4u6yyE1PLhZJwzhfe31gKDcO8d5A0zEoY5g84OtIIrwXeSkwfp2mIALBFuau_Y5hk0uCXvWu_TEYjf54fddVJTijzajJB87Adjfs6dPIqAU4ZL6EKVHvCA=w122-h64-n',
            'https://lh5.googleusercontent.com/proxy/pz1NeNjilPXpwv00-ibd-Xo2l-bAcz34eMSGZZ6HedA__okYm0aF9qHf72SLaoNJILdhXWy89Ypu4uEj4zHos3byw5uSaJzvu4t8q7oRXo46xZgOxOpOQ1yylfrxbutcmBn_oGtYGFAJnsiRY1NmPrTglzgoLUU=w122-h64-n',
        ];




        User::factory(10)->create();
        $hotels = Hotel::factory(25)->create();
        foreach ($hotels as $index => $hotel) {
            $hotel->update(['image' => $images[$index]]);
        }
        Room::factory(20)->create();
        Coupon::factory(5)->create();
        Booking::factory(15)->create();
        Review::factory(20)->create();
        Wishlist::factory(10)->create();
    }
}
