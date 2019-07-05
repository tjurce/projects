using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace GYM
{
    public partial class LoginForm : Form
    {
        static GYM_database gymDatabaseContext = new GYM_database();
        public static Employees loggedWorker = new Employees();

        public LoginForm()
        {
            InitializeComponent();
            txtPassword.PasswordChar = '*';
        }

        void CheckLogin()
        {
            var employees = from w in gymDatabaseContext.Workers select w;

            foreach (Workers w in employees)
            {
                var logins = from l in gymDatabaseContext.LoginInfos where l.employeeID == w.employeeId select l;

                foreach (LoginInfos l in logins)
                    if (l.username == txtUserName.Text && l.pass == txtPassword.Text)
                    {
                        loggedWorker.firstName = l.Workers.Employees.firstName;
                        loggedWorker.lastName = l.Workers.Employees.lastName;
                        LoginInformationForm LIF = new LoginInformationForm();
                        LIF.Show();
                        this.Hide();
                    }
            }
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            CheckLogin();
        }

        private void LoginForm_KeyDown(object sender, KeyEventArgs e)
        {
            if (e.KeyCode == Keys.Enter)
                CheckLogin();
        }
    }
}
