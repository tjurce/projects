namespace GYM
{
    using System;
    using System.Collections.Generic;
    using System.ComponentModel.DataAnnotations;
    using System.ComponentModel.DataAnnotations.Schema;
    using System.Data.Entity.Spatial;

    public partial class Subscriptions
    {
        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2214:DoNotCallOverridableMethodsInConstructors")]
        public Subscriptions()
        {
            Members = new HashSet<Members>();
        }

        [Key]
        [DatabaseGenerated(DatabaseGeneratedOption.None)]
        public int subId { get; set; }

        [Required]
        [StringLength(30)]
        public string subName { get; set; }

        public double price { get; set; }

        [System.Diagnostics.CodeAnalysis.SuppressMessage("Microsoft.Usage", "CA2227:CollectionPropertiesShouldBeReadOnly")]
        public virtual ICollection<Members> Members { get; set; }
    }
}
