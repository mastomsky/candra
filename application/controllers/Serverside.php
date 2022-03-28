
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serverside extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Serverside_m', 'Category_m', 'user_m', 'Portfolio_m', 'Vehicles_m', 'Dashboard_m', 'Details_m']);
    }
    function get_vehicles()
    {
        $list = $this->Vehicles_m->get_datatables_vehicles();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $vehicles) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $vehicles->foto != null ? '<img src="' . base_url('uploads/vehicles/' . $vehicles->foto) . '" class="img" style="width:100px">' : null;
            $row[] = $vehicles->nama;
            $row[] = $vehicles->category_nama;
            $row[] = $vehicles->harga;

            // if ($vehicles->type == 1) : $type = ' <span>GR</span>';
            // else : $type = '<span >None</span>';
            // endif;
            // $row[] = $type;
            // add html for action
            $row[] = '<a href="' . site_url('panel/vehicles/edit/' . $vehicles->vehicles_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="' . site_url('panel/vehicles/del/' . $vehicles->vehicles_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Vehicles_m->count_all_vehicles(),
            "recordsFiltered" => $this->Vehicles_m->count_filtered_vehicles(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    function get_vehicles_modal()
    {
        $list = $this->Vehicles_m->get_datatables_vehicles();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $vehicles) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $vehicles->foto != null ? '<img src="' . base_url('uploads/vehicles/' . $vehicles->foto) . '" class="img" style="width:100px">' : null;
            $row[] = $vehicles->nama;
            $row[] = $vehicles->category_nama;
            $row[] = $vehicles->harga;

            // if ($vehicles->type == 1) : $type = ' <span>GR</span>';
            // else : $type = '<span >None</span>';
            // endif;
            // $row[] = $type;
            // add html for action
            $row[] = '<a type="button" class="btn btn-secondary btn-sm"  id="select"
            data-vehicles_id="' . $vehicles->vehicles_id . '"
            data-nama="' . $vehicles->nama . '"
            data-category_id="' . $vehicles->category . '"
            data-category="' . $vehicles->category_nama . '"
           
            ><i class="fa fa-check" aria-hidden="true">&nbsp;Select</i>
       </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Vehicles_m->count_all_vehicles(),
            "recordsFiltered" => $this->Vehicles_m->count_filtered_vehicles(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    function get_banner()
    {
        $list = $this->Dashboard_m->get_datatables();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $banner) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $banner->foto != null ? '<img src="' . base_url('uploads/banner/' . $banner->foto) . '" class="img" style="width:100px">' : null;
            if ($banner->status == 1) : $status = ' <span class="badge badge-pill badge-success">Aktif</span>';
            else : $status = '<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
            endif;
            $row[] = $status;
            // add html for action
            $row[] = '<a href="' . site_url('panel/banner/edit/' . $banner->ban_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="' . site_url('panel/banner/del/' . $banner->ban_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Dashboard_m->count_all(),
            "recordsFiltered" => $this->Dashboard_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    // Get data portfolio
    function get_portfolio()
    {
        $list = $this->Portfolio_m->get_datatables_portfolio();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $portfolio) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $portfolio->foto != null ? '<img src="' . base_url('uploads/portfolio/' . $portfolio->foto) . '" class="img" style="width:100px">' : null;
            $row[] = $portfolio->created;
            // add html for action
            $row[] = '<a href="' . site_url('panel/portfolio/edit/' . $portfolio->portfolio_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="' . site_url('panel/portfolio/del/' . $portfolio->portfolio_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Portfolio_m->count_all_portfolio(),
            "recordsFiltered" => $this->Portfolio_m->count_filtered_portfolio(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    // Get data promo
    function get_promo()
    {
        $list = $this->Category_m->get_datatables_promo();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $promo) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $promo->foto != null ? '<img src="' . base_url('uploads/promo/' . $promo->foto) . '" class="img" style="width:100px">' : null;
            $row[] = $promo->keterangan;
            if ($promo->status == 1) : $status = ' <span class="badge badge-pill badge-success">Aktif</span>';
            else : $status = '<span class="badge badge-pill badge-danger">Tidak Aktif</span>';
            endif;
            $row[] = $status;
            // add html for action
            $row[] = '<a href="' . site_url('panel/promo/edit/' . $promo->promo_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="' . site_url('panel/promo/del/' . $promo->promo_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Category_m->count_all_promo(),
            "recordsFiltered" => $this->Category_m->count_filtered_promo(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    // Get data category
    function get_category()
    {
        $list = $this->Category_m->get_datatables_category();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $category) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $category->nama;

            // add html for action
            $row[] = '<a href="' . site_url('panel/category/edit/' . $category->category_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('panel/category/del/' . $category->category_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Category_m->count_all_category(),
            "recordsFiltered" => $this->Category_m->count_filtered_category(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    // Get data type
    function get_type()
    {
        $list = $this->Category_m->get_datatables_type();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $type) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $type->type_nama;

            // add html for action
            $row[] = '<a href="' . site_url('panel/vehicle-type/edit/' . $type->type_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('panel/vehicle-type/del/' . $type->type_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Category_m->count_all_type(),
            "recordsFiltered" => $this->Category_m->count_filtered_type(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    function get_detail_product()
    {
        $list = $this->Details_m->get_datatables_detail_product();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $detail_product) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $detail_product->foto_detail != null ? '<img src="' . base_url('uploads/vehicle-detail/' . $detail_product->foto_detail) . '" class="img" style="width:100px">' : null;
            $row[] = $detail_product->Vehicles;
            $row[] = $detail_product->Category;
            $row[] = $detail_product->type_nama;
            $row[] = $detail_product->price;

            // add html for action
            $row[] = '<a href="' . site_url('panel/vehicle-detail/edit/' . $detail_product->detail_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('panel/vehicle-detail/del/' . $detail_product->detail_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Details_m->count_all_detail_product(),
            "recordsFiltered" => $this->Details_m->count_filtered_detail_product(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    // Get data user

    function get_user()
    {
        $list = $this->user_m->get_datatables();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $user->nama;
            if ($user->jk == 1) : $jk = ' <span >Laki-Laki</span>';
            else : $jk = '<span >Perempuan</span>';
            endif;
            $row[] = $jk;
            $row[] = $user->telpon;
            $row[] = $user->email;

            if ($user->status == 1) : $status = ' <span style="color: green;">Aktif</span>';
            else : $status = '<span style="color: red;">Tidak Aktif</span>';
            endif;
            $row[] = $status;


            $row[] = $user->foto != null ? '<img src="' . base_url('uploads/user/' . $user->foto) . '" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="' . site_url('panel/user/edit/' . $user->user_id) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a href="' . site_url('panel/user/del/' . $user->user_id) . '" id="btn_hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->user_m->count_all(),
            "recordsFiltered" => $this->user_m->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
    // Get data Inbox
    function get_inbox()
    {
        $list = $this->Inbox_m->get_datatables_inbox();

        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $inbox) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $inbox->nama;
            $row[] = $inbox->phone;
            $row[] = $inbox->email;
            $row[] = $inbox->message;
            $row[] = $inbox->created;

            // add html for action
            $row[] = '<a href="https://api.whatsapp.com/send?phone=' . $inbox->phone . '" target="_blank" class="btn btn-success btn-sm"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                     <a href="mailto:' . $inbox->email . '" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-envelope"></i></a>
                     <a type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-lg" id="select"
                     data-nama="' . $inbox->nama . '"
                     data-phone="' . $inbox->phone . '"
                     data-service="' . $inbox->service_nama . '"
                     data-email="' . $inbox->email . '"
                     data-message="' . $inbox->message . '"
                     data-created="' . $inbox->created . '"
                     ><i class="fa fa-eye"></i>
                </a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Inbox_m->count_all_inbox(),
            "recordsFiltered" => $this->Inbox_m->count_filtered_inbox(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
}
